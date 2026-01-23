@props(['url', 'peserta', 'evaluasi' => null])

<div x-data="calculator(
    {{ $evaluasi->nilai_disiplin ?? 0 }},
    {{ $evaluasi->nilai_kerjasama ?? 0 }},
    {{ $evaluasi->nilai_inisiatif ?? 0 }},
    {{ $evaluasi->nilai_kerajinan ?? 0 }}
)" x-init="calculate()" class="relative">

    @include('admin.evaluasi.partials._header_info')

    <form action="{{ $url }}" method="POST">
        @csrf
        @if ($evaluasi)
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2 space-y-6">
                @include('admin.evaluasi.partials._input_scores')

                @include('admin.evaluasi.partials._input_notes')
            </div>

            <div class="lg:col-span-1">
                @include('admin.evaluasi.partials._sidebar_actions')
            </div>

        </div>
    </form>
</div>

@include('admin.evaluasi.partials._script')
