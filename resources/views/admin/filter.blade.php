@extends('layouts.admin')

@section('title', 'Filter & Pencarian')

@section('content')

<div class="admin-card p-8 mb-8">
    <h3 class="text-[20px] font-extrabold text-[#083B6E] mb-5">Filter & Pencarian</h3>

    <!-- Filter Panel -->
    <form method="GET" action="{{ route('admin.filter') }}">
        <!-- Date Range Picker -->
        <div class="mb-5">
            <label for="date_range" class="block text-sm font-bold">Rentang Tanggal</label>
            <input type="text" name="start_date" id="start_date" placeholder="MM/DD/YYYY" class="datepicker input" />
            <span>to</span>
            <input type="text" name="end_date" id="end_date" placeholder="MM/DD/YYYY" class="datepicker input" />
        </div>

        <!-- Account Filter -->
        <div class="mb-5">
            <label class="block text-sm font-bold">Akun Sumber</label>
            <label><input type="checkbox" name="account[]" value="Peduli Sungai Surabaya"> Peduli Sungai Surabaya</label><br>
            <label><input type="checkbox" name="account[]" value="Ecoton Foundation"> Ecoton Foundation</label><br>
        </div>

        <!-- Hashtag Filter -->
        <div class="mb-5">
            <label class="block text-sm font-bold">Hashtag Populer</label>
            <label><input type="checkbox" name="hashtag[]" value="#BrantasResik"> #BrantasResik</label><br>
            <label><input type="checkbox" name="hashtag[]" value="#SaveSurabayaRiver"> #SaveSurabayaRiver</label><br>
            <label><input type="checkbox" name="hashtag[]" value="#ZeroWaste"> #ZeroWaste</label><br>
        </div>

        <!-- Apply Filter Button -->
        <button type="submit" class="bg-[#2E9F43] text-white px-5 py-3 rounded-full text-sm">Terapkan Filter</button>
    </form>
</div>

<!-- Filtered Data Table -->
<div class="admin-card p-8">
    <h3 class="text-[20px] font-extrabold text-[#083B6E] mb-5">Hasil Pencarian Terperinci</h3>

    <table class="w-full table-auto border-collapse text-sm">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b text-left">Tanggal</th>
                <th class="px-4 py-2 border-b text-left">Akun</th>
                <th class="px-4 py-2 border-b text-left">Caption</th>
                <th class="px-4 py-2 border-b text-left">Engagement</th>
            </tr>
        </thead>
        <tbody>
            <!-- Display Filtered Data -->
            @foreach ($filteredData as $data)
                <tr>
                    <td class="px-4 py-3 border-b">{{ $data->date }}</td>
                    <td class="px-4 py-3 border-b">{{ $data->account }}</td>
                    <td class="px-4 py-3 border-b">{{ $data->caption }}</td>
                    <td class="px-4 py-3 border-b">{{ $data->engagement }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        $('#start_date, #end_date').datepicker({
            dateFormat: 'mm/dd/yy'
        });
    });
</script>
@endsection