<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin - Analisis Hashtag</title>

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;600;800&display=swap" rel="stylesheet">

<style>
body { font-family: 'Manrope', sans-serif; }
</style>
</head>

<body class="bg-gray-50 flex">

<!-- SIDEBAR -->
<aside class="w-64 h-screen bg-white shadow-lg fixed p-6">
  <h1 class="text-2xl font-extrabold text-blue-900">SuraTrend</h1>

  <nav class="mt-10 space-y-2 text-sm">
    <a href="#" class="block p-3 rounded hover:bg-gray-100">Dashboard</a>
    <a href="#" class="block p-3 rounded hover:bg-gray-100">Import</a>
    <a href="#" class="block p-3 rounded hover:bg-gray-100">Input Data</a>
    <a href="#" class="block p-3 rounded bg-blue-900 text-white font-semibold">Analisis Hashtag</a>
  </nav>
</aside>

<!-- MAIN -->
<main class="ml-64 w-full p-10">

<!-- HEADER -->
<div class="flex justify-between items-center mb-8">
  <div>
    <h1 class="text-3xl font-extrabold text-blue-900">Analisis Hashtag</h1>
    <p class="text-gray-500 text-sm">Pantau performa hashtag lingkungan</p>
  </div>

  <button class="bg-blue-900 text-white px-5 py-2 rounded-lg text-sm">
    Ekspor Data
  </button>
</div>

<!-- GRID -->
<div class="grid grid-cols-12 gap-6">

<!-- LEFT -->
<div class="col-span-12 lg:col-span-8 space-y-6">

  <!-- TOP HASHTAG -->
  <div class="bg-white p-6 rounded-xl shadow">
    <div class="flex justify-between mb-4">
      <h2 class="font-bold text-lg">Top Hashtags</h2>
      <span class="text-green-600 text-xs font-bold">+12%</span>
    </div>

    <div id="topHashtags" class="space-y-4"></div>
  </div>

  <!-- RANKING -->
  <div class="bg-white p-6 rounded-xl shadow">
    <h2 class="font-bold text-lg mb-4">Ranking Hashtag</h2>

    <table class="w-full text-sm">
      <thead class="text-gray-400 text-xs">
        <tr>
          <th>#</th>
          <th>Hashtag</th>
          <th>Jumlah</th>
        </tr>
      </thead>
      <tbody id="rankingTable"></tbody>
    </table>
  </div>

</div>

<!-- RIGHT -->
<div class="col-span-12 lg:col-span-4 space-y-6">

  <!-- INSIGHT -->
  <div class="bg-blue-900 text-white p-6 rounded-xl">
    <h3 class="text-sm uppercase mb-2 opacity-70">Insight</h3>
    <p class="text-lg font-bold">
      <span id="topTag"></span> mendominasi minggu ini
    </p>
  </div>

  <!-- TRENDING -->
  <div class="bg-white p-6 rounded-xl shadow">
    <h3 class="font-bold mb-3">Trending</h3>
    <div id="trendingTags" class="flex flex-wrap gap-2"></div>
  </div>

</div>

</div>

</main>

<!-- SCRIPT -->
<script>

// DATA DINAMIS (SIMULASI API)
const data = {
  hashtags: [
    { tag: "#sungaisurabaya", count: 38 },
    { tag: "#pedulisungai", count: 25 },
    { tag: "#ecoton", count: 20 },
    { tag: "#surabayahijau", count: 18 },
    { tag: "#brantas", count: 15 }
  ],
  trending: ["#bebasplastik", "#limbahindustri", "#airbersih", "#ecofriendly"]
};

// RENDER TOP HASHTAG
function renderTop() {
  const container = document.getElementById("topHashtags");
  container.innerHTML = "";

  const max = Math.max(...data.hashtags.map(h => h.count));

  data.hashtags.forEach(h => {
    const percent = (h.count / max) * 100;

    container.innerHTML += `
      <div>
        <div class="flex justify-between text-xs mb-1">
          <span>${h.tag}</span>
          <span>${h.count}</span>
        </div>
        <div class="w-full bg-gray-200 h-2 rounded">
          <div class="bg-blue-900 h-2 rounded" style="width:${percent}%"></div>
        </div>
      </div>
    `;
  });
}

// RENDER RANKING
function renderRanking() {
  const table = document.getElementById("rankingTable");
  table.innerHTML = "";

  data.hashtags.forEach((h, i) => {
    table.innerHTML += `
      <tr class="border-t">
        <td class="py-3 font-bold">${i+1}</td>
        <td>${h.tag}</td>
        <td>${h.count}</td>
      </tr>
    `;
  });

  document.getElementById("topTag").innerText = data.hashtags[0].tag;
}

// RENDER TRENDING
function renderTrending() {
  const container = document.getElementById("trendingTags");
  container.innerHTML = "";

  data.trending.forEach(tag => {
    container.innerHTML += `
      <span class="px-3 py-1 bg-gray-100 rounded-full text-xs font-semibold">
        ${tag}
      </span>
    `;
  });
}

// INIT
renderTop();
renderRanking();
renderTrending();

</script>

</body>
</html>