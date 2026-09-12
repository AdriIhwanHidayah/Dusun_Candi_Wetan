const fs = require('node:fs');
const path = require('node:path');

const roots = [
    '/vercel/path0/.vercel/builders/node_modules/vercel-php',
    path.join(process.cwd(), '.vercel', 'builders', 'node_modules', 'vercel-php'),
];

const packageRoot = roots.find((root) => fs.existsSync(root));

if (!packageRoot) {
    throw new Error('Could not find vercel-php runtime package directory.');
}

// Recursively collect every file under the package (skip node_modules-within-node_modules, keep it simple)
function walk(dir, files = []) {
    for (const entry of fs.readdirSync(dir, { withFileTypes: true })) {
        const fullPath = path.join(dir, entry.name);
        if (entry.isDirectory()) {
            walk(fullPath, files);
        } else if (entry.isFile()) {
            files.push(fullPath);
        }
    }
    return files;
}

const allFiles = walk(packageRoot);

const handlerPattern = /launcher\.launcher/g;

let patchedCount = 0;
let alreadyPatchedCount = 0;

for (const file of allFiles) {
    let content;
    try {
        content = fs.readFileSync(file, 'utf8');
    } catch (err) {
        // binary or unreadable file, skip
        continue;
    }

    if (handlerPattern.test(content)) {
        // reset lastIndex since we used a global regex with .test()
        handlerPattern.lastIndex = 0;
        const patched = content.replace(handlerPattern, 'launcher.js');
        fs.writeFileSync(file, patched);
        console.log(`Patched occurrence(s) of "launcher.launcher" in ${file}`);
        patchedCount++;
    }
}

if (patchedCount === 0) {
    // Check if already patched (no "launcher.launcher" left anywhere, but "launcher.js" present somewhere)
    const stillHasOldValue = allFiles.some((file) => {
        try {
            return fs.readFileSync(file, 'utf8').includes('launcher.launcher');
        } catch {
            return false;
        }
    });
    if (!stillHasOldValue) {
        console.log('vercel-php handler appears already patched (no "launcher.launcher" found in any file).');
    } else {
        throw new Error('Expected vercel-php handler string was not found in any file.');
    }
} else {
    console.log(`Done. Patched ${patchedCount} file(s).`);
}
