document.addEventListener('DOMContentLoaded', () => {

    const ctx = document.getElementById('salesHeatmap').getContext('2d');
new Chart(ctx, {
    type: 'matrix',
    data: {
        datasets: [{
            label: 'Sales Heatmap',
            data: dataPoints,
            backgroundColor: function(ctx) {
                const value = ctx.dataset.data[ctx.dataIndex].v;
                if (value === 0) return '#eeeeee';       // no sales
                if (value < 3) return '#a6e3a1';        // light green
                if (value < 6) return '#4caf50';        // medium green
                return '#1b5e20';                       // dark green
            },
            width: ({ chart }) => (chart.chartArea || {}).width / 53 - 2, // space per week
            height: ({ chart }) => (chart.chartArea || {}).height / 7 - 2, // space per day
        }]
    },
    options: {
        responsive: true,
        plugins: {
            tooltip: {
                callbacks: {
                    title: ctx => {
                        const dp = ctx[0].raw;
                        // calculate the date from week + day
                        const date = new Date(startDate.getTime() + dp.x * 7 * 24 * 60 * 60 * 1000 + dp.y * 24 * 60 * 60 * 1000);
                        return date.toDateString();
                    },
                    label: ctx => `${ctx.raw.v} sales`
                }
            },
            legend: {
                display: false
            }
        },
        scales: {
            x: {
                type: 'linear',
                display: false
            },
            y: {
                type: 'linear',
                display: false,
                reverse: true
            }
        }
    }
});

});
