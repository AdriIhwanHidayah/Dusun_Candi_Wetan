document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.querySelector('.nav-toggle');
    const nav = document.querySelector('.site-nav');

    if (!toggle || !nav) {
        return;
    }

    toggle.addEventListener('click', function () {
        nav.classList.toggle('is-open');
        toggle.setAttribute('aria-expanded', nav.classList.contains('is-open') ? 'true' : 'false');
    });

    nav.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
            nav.classList.remove('is-open');
            toggle.setAttribute('aria-expanded', 'false');
        });
    });

    initializePopulationCharts();
});

function initializePopulationCharts() {
    if (typeof Chart === 'undefined' || !window.populationStatistics) {
        return;
    }

    const records = window.populationStatistics;
    const colors = ['#14532D', '#2E7D32', '#C9A227', '#5E6F63', '#8E6B23', '#9C6644', '#3D7A80', '#6B7280'];

    function sumBySubcategory(category) {
        return records
            .filter(function (record) { return record.kategori === category; })
            .reduce(function (totals, record) {
                totals[record.subkategori] = (totals[record.subkategori] || 0) + record.jumlah;
                return totals;
            }, {});
    }

    function createHorizontalChart(id, category) {
        const totals = sumBySubcategory(category);
        const labels = Object.keys(totals);
        const canvas = document.getElementById(id);

        if (!canvas || labels.length === 0) {
            return null;
        }

        return new Chart(canvas, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah',
                    data: labels.map(function (label) { return totals[label]; }),
                    backgroundColor: colors[0],
                    borderRadius: 6,
                }],
            },
            options: {
                indexAxis: 'y',
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { x: { beginAtZero: true, ticks: { precision: 0 } } },
            },
        });
    }

    const genderTotals = sumBySubcategory('Jenis Kelamin');
    const genderCanvas = document.getElementById('gender-chart');
    if (genderCanvas && Object.keys(genderTotals).length > 0) {
        new Chart(genderCanvas, {
            type: 'doughnut',
            data: {
                labels: Object.keys(genderTotals),
                datasets: [{
                    data: Object.values(genderTotals),
                    backgroundColor: [colors[0], colors[2]],
                    borderWidth: 3,
                    borderColor: '#FFFFFF',
                }],
            },
            options: {
                maintainAspectRatio: false,
                cutout: '62%',
                plugins: { legend: { position: 'bottom' } },
            },
        });
    }

    createHorizontalChart('religion-chart', 'Keagamaan');
    createHorizontalChart('job-chart', 'Pekerjaan');
    createHorizontalChart('education-chart', 'Pendidikan');

    const comparisonSelect = document.getElementById('comparison-category');
    const comparisonCanvas = document.getElementById('comparison-chart');
    if (!comparisonSelect || !comparisonCanvas) {
        return;
    }

    let comparisonChart;
    function renderComparisonChart(category) {
        const grouped = {};
        records
            .filter(function (record) { return record.kategori === category; })
            .forEach(function (record) {
                const area = 'RT ' + (record.rt || '--') + ' / RW ' + (record.rw || '--');
                grouped[area] = grouped[area] || {};
                grouped[area][record.subkategori] = (grouped[area][record.subkategori] || 0) + record.jumlah;
            });

        const areas = Object.keys(grouped);
        const subcategories = [...new Set(records
            .filter(function (record) { return record.kategori === category; })
            .map(function (record) { return record.subkategori; }))];
        const datasets = subcategories.map(function (subcategory, index) {
            return {
                label: subcategory,
                data: areas.map(function (area) { return grouped[area][subcategory] || 0; }),
                backgroundColor: colors[index % colors.length],
                borderRadius: 4,
            };
        });

        if (comparisonChart) {
            comparisonChart.destroy();
        }
        comparisonChart = new Chart(comparisonCanvas, {
            type: 'bar',
            data: { labels: areas, datasets: datasets },
            options: {
                maintainAspectRatio: false,
                scales: { x: { stacked: true }, y: { stacked: true, beginAtZero: true, ticks: { precision: 0 } } },
                plugins: { legend: { position: 'bottom' } },
            },
        });
    }

    comparisonSelect.addEventListener('change', function () {
        renderComparisonChart(comparisonSelect.value);
    });
    renderComparisonChart(comparisonSelect.value);
}
