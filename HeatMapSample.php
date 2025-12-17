<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>D3.js GitHub Style Heatmap with Label Spacing</title>
<script src="https://d3js.org/d3.v7.min.js"></script>
<style>
    body { font-family: Arial, sans-serif; padding: 30px; }

    .month-label {
        font-size: 12px;
        fill: #555;
    }

    .weekday-label {
        font-size: 12px;
        fill: #777;
    }

    .tooltip {
        position: absolute;
        padding: 5px 8px;
        background: #333;
        color: #fff;
        border-radius: 4px;
        font-size: 12px;
        pointer-events: none;
        opacity: 0;
    }
</style>
</head>
<body>

<h2>Sales Heat Map</h2>

<div id="heatmap"></div>
<div class="tooltip" id="tooltip"></div>

<script>
// ===================== CONFIG ===================== //
const cellSize = 15;
const width = 900;
const height = 150;

// ------ Add spacing here ------ //
const topOffset = 30;     // Gap between month labels and heatmap
const leftOffset = 40;    // Gap between weekday labels and heatmap

// Generate 365 days of random data
const startDate = d3.timeDay.offset(new Date(), -365);
const data = d3.timeDays(startDate, new Date()).map(d => ({
    date: d,
    value: Math.floor(Math.random() * 10)
}));

// GitHub-style color scale
const color = d3.scaleThreshold()
    .domain([1, 3, 6])
    .range(["#ebedf0", "#e9ba9bff", "#ec743dff", "#e93b1dff"]);

// Create SVG
const svg = d3.select("#heatmap")
    .append("svg")
    .attr("width", width + leftOffset + 20)
    .attr("height", height + topOffset + 40);

const tooltip = d3.select("#tooltip");

const formatWeek = d3.timeFormat("%U");

// ===================== DRAW HEATMAP ===================== //
svg.selectAll(".day")
    .data(data)
    .enter()
    .append("rect")
    .attr("class", "day")
    .attr("width", cellSize)
    .attr("height", cellSize)
    .attr("x", d => leftOffset + +formatWeek(d.date) * (cellSize + 2))
    .attr("y", d => topOffset + d.date.getDay() * (cellSize + 2))
    .attr("fill", d => color(d.value))
    .on("mouseover", function (event, d) {
        tooltip.style("opacity", 1)
            .html(`<strong>${d.date.toDateString()}</strong><br>${d.value} sales`)
            .style("left", (event.pageX + 10) + "px")
            .style("top", (event.pageY - 20) + "px");
        d3.select(this).attr("stroke", "#333");
    })
    .on("mouseout", function () {
        tooltip.style("opacity", 0);
        d3.select(this).attr("stroke", "none");
    });

// ===================== MONTH LABELS ===================== //
const months = d3.timeMonths(startDate, new Date());
const monthFormat = d3.timeFormat("%b");

svg.selectAll(".month-label")
    .data(months)
    .enter()
    .append("text")
    .attr("class", "month-label")
    .attr("x", d => leftOffset + +formatWeek(d) * (cellSize + 2))
    .attr("y", topOffset - 8)   // Move up using spacing
    .text(d => monthFormat(d));

// ===================== WEEKDAY LABELS ===================== //
const weekdays = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

svg.selectAll(".weekday-label")
    .data(weekdays)
    .enter()
    .append("text")
    .attr("class", "weekday-label")
    .attr("x", leftOffset - 8)   // Move left using spacing
    .attr("y", (d, i) => topOffset + i * (cellSize + 2) + 12)
    .attr("text-anchor", "end")
    .text(d => d);

</script>

</body>
</html>
