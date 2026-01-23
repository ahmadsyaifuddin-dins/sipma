<x-onboarding-layout>
    <div x-data="dateCalculator()" class="max-w-5xl mx-auto">

        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold text-gray-800">Lengkapi Biodata Magang</h2>
            <p class="text-gray-500 mt-2">Isi formulir di bawah ini untuk menyelesaikan proses pendaftaran.</p>
        </div>

        @include('pemagang.pendaftaran.partials._alert')

        <form action="{{ route('pemagang.daftar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-1 space-y-6">
                    @include('pemagang.pendaftaran.partials._form_pribadi')
                </div>

                <div class="lg:col-span-2 space-y-6">
                    @include('pemagang.pendaftaran.partials._form_akademik')
                    @include('pemagang.pendaftaran.partials._form_upload')
                </div>

            </div>

            <div class="mt-8 flex justify-end">
                <button type="submit"
                    class="px-8 py-4 bg-indigo-600 text-white font-bold rounded-xl shadow-lg hover:bg-indigo-700 hover:shadow-xl transition transform hover:-translate-y-1 flex items-center gap-2">
                    <span>Kirim Pendaftaran</span>
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>

        </form>
    </div>

    <script>
        function dateCalculator() {
            return {
                start: '',
                end: '',
                durationText: '',
                monthText: '',
                error: false,

                calculate() {
                    if (this.start && this.end) {
                        const startDate = new Date(this.start);
                        const endDate = new Date(this.end);
                        const diffTime = endDate - startDate;

                        if (diffTime < 0) {
                            this.error = true;
                            this.durationText = '';
                            this.monthText = '';
                        } else {
                            this.error = false;
                            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
                            this.durationText = `${diffDays} Hari`;

                            const months = Math.floor(diffDays / 30);
                            const remainingDays = diffDays % 30;

                            let text = '(Kurang lebih ';
                            if (months > 0) text += `${months} Bulan`;
                            if (remainingDays > 0) text += months > 0 ? ` ${remainingDays} Hari` : `${remainingDays} Hari`;
                            text += ')';

                            this.monthText = text;
                        }
                    }
                }
            }
        }
    </script>
</x-onboarding-layout>
