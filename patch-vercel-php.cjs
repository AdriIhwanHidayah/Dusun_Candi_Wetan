const fs = require('node:fs');
const path = require('node:path');

const roots = [
    '/vercel/path0/.vercel/builders/node_modules/vercel-php',
    path.join(process.cwd(), '.vercel', 'builders', 'node_modules', 'vercel-php'),
];

function findRuntimeFile(root) {
    if (!fs.existsSync(root)) {
        return null;
    }

    const directFile = path.join(root, 'dist', 'index.js');
    if (fs.existsSync(directFile)) {
        return directFile;
    }

    return null;
}

const runtimeFile = roots.map(findRuntimeFile).find(Boolean);

if (!runtimeFile) {
    throw new Error('Could not find vercel-php runtime build file.');
}

const source = fs.readFileSync(runtimeFile, 'utf8');
const handlerPattern = /handler:\s*["']launcher\.launcher["']/;

if (handlerPattern.test(source)) {
    const patched = source.replace(handlerPattern, "handler: 'launcher.js'");
    fs.writeFileSync(runtimeFile, patched);
    console.log(`Patched vercel-php handler in ${runtimeFile}`);
} else if (source.includes("handler: 'launcher.js'")) {
    console.log('vercel-php handler is already patched.');
} else {
    throw new Error('Expected vercel-php handler was not found.');
}
