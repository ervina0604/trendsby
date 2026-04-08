<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin - Kelola Konten</title>

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;600;700;800&display=swap" rel="stylesheet"/>

<style>
body { font-family: 'Manrope', sans-serif; }
</style>

</head>

<body class="bg-gray-50 flex">

<!-- SIDEBAR -->
<aside class="w-64 h-screen bg-white shadow-sm p-6 fixed">
    <h1 class="text-xl font-bold text-blue-900 mb-8">SuraTrend</h1>

    <nav class="space-y-2 text-sm">
        <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">Dashboard</a>
        <a href="#" class="block px-3 py-2 rounded bg-green-100 text-green-700 font-semibold">Kelola Data</a>
        <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">Analisis</a>
    </nav>
</aside>

<!-- MAIN -->
<main class="ml-64 flex-1 p-8">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold">Kelola Data Konten</h2>
            <p class="text-gray-500 text-sm">Manajemen data sosial media lingkungan</p>
        </div>

        <button class="bg-blue-900 text-white px-5 py-2 rounded-lg">
            + Tambah Data
        </button>
    </div>

    <!-- FILTER -->
    <div class="bg-white p-4 rounded-xl shadow-sm flex flex-wrap gap-3 mb-6">

        <select id="filterAkun" class="border px-3 py-2 rounded">
            <option value="">Semua Akun</option>
        </select>

        <input id="searchInput" type="text" placeholder="Cari caption / hashtag"
            class="border px-3 py-2 rounded flex-1 min-w-[200px]"/>

        <button onclick="applyFilter()" class="bg-green-600 text-white px-4 py-2 rounded">
            Terapkan
        </button>

        <button onclick="resetFilter()" class="text-gray-500">
            Reset
        </button>

    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">

        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="p-3 text-left">Tanggal</th>
                    <th class="p-3 text-left">Akun</th>
                    <th class="p-3 text-left">Caption</th>
                    <th class="p-3 text-left">Hashtag</th>
                    <th class="p-3 text-center">Likes</th>
                    <th class="p-3 text-center">Komentar</th>
                    <th class="p-3 text-right">Aksi</th>
                </tr>
            </thead>

            <tbody id="tableBody"></tbody>
        </table>

        <!-- PAGINATION -->
        <div class="flex justify-between items-center p-4 text-sm text-gray-500">
            <span id="info"></span>

            <div class="flex gap-2">
                <button onclick="prevPage()">Prev</button>
                <button onclick="nextPage()">Next</button>
            </div>
        </div>

    </div>

</main>

<!-- SCRIPT DINAMIS -->
<script>

const data = [
    {
        tanggal: "24 Mei 2024",
        akun: "Peduli Sungai",
        caption: "Aksi bersih sungai Kalimas",
        hashtag: ["kalimas","surabaya"],
        likes: 1240,
        komentar: 84
    },
    {
        tanggal: "22 Mei 2024",
        akun: "Ecoton",
        caption: "Temuan mikroplastik meningkat",
        hashtag: ["mikroplastik","ecoton"],
        likes: 3512,
        komentar: 210
    },
    {
        tanggal: "19 Mei 2024",
        akun: "Peduli Sungai",
        caption: "Edukasi pengelolaan sampah",
        hashtag: ["edukasi","zerowaste"],
        likes: 890,
        komentar: 45
    },
    {
        tanggal: "15 Mei 2024",
        akun: "Ecoton",
        caption: "Audit limbah industri",
        hashtag: ["audit","brantas"],
        likes: 2100,
        komentar: 156
    }
];

// STATE
let filteredData = [...data];
let currentPage = 1;
const perPage = 3;

// INIT
init();

function init(){
    renderAkunFilter();
    renderTable();
}

// FILTER AKUN
function renderAkunFilter(){
    const akunSet = [...new Set(data.map(d => d.akun))];
    const select = document.getElementById("filterAkun");

    akunSet.forEach(a=>{
        const opt = document.createElement("option");
        opt.value = a;
        opt.textContent = a;
        select.appendChild(opt);
    });
}

// APPLY FILTER
function applyFilter(){
    const akun = document.getElementById("filterAkun").value;
    const search = document.getElementById("searchInput").value.toLowerCase();

    filteredData = data.filter(d=>{
        return (
            (!akun || d.akun === akun) &&
            (d.caption.toLowerCase().includes(search) ||
             d.hashtag.join(" ").includes(search))
        );
    });

    currentPage = 1;
    renderTable();
}

// RESET
function resetFilter(){
    filteredData = [...data];
    document.getElementById("filterAkun").value = "";
    document.getElementById("searchInput").value = "";
    renderTable();
}

// RENDER TABLE
function renderTable(){
    const tbody = document.getElementById("tableBody");
    tbody.innerHTML = "";

    const start = (currentPage - 1) * perPage;
    const paginated = filteredData.slice(start, start + perPage);

    paginated.forEach(d=>{
        const row = `
        <tr class="border-t hover:bg-gray-50">
            <td class="p-3">${d.tanggal}</td>
            <td class="p-3">${d.akun}</td>
            <td class="p-3">${d.caption}</td>
            <td class="p-3">
                ${d.hashtag.map(h=>`<span class="text-green-600 text-xs mr-1">#${h}</span>`).join("")}
            </td>
            <td class="p-3 text-center font-semibold">${d.likes}</td>
            <td class="p-3 text-center font-semibold">${d.komentar}</td>
            <td class="p-3 text-right">
                <button class="text-blue-600">Edit</button>
                <button class="text-red-500 ml-2">Hapus</button>
            </td>
        </tr>
        `;
        tbody.innerHTML += row;
    });

    document.getElementById("info").innerText =
        `Menampilkan ${start+1}-${start+paginated.length} dari ${filteredData.length}`;
}

// PAGINATION
function nextPage(){
    if(currentPage * perPage < filteredData.length){
        currentPage++;
        renderTable();
    }
}

function prevPage(){
    if(currentPage > 1){
        currentPage--;
        renderTable();
    }
}

</script>

</body>
</html>