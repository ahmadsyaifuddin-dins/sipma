<script>
    function calculator(
        // Default value 0 untuk 10 parameter
        i1 = 0, i2 = 0, i3 = 0, i4 = 0, i5 = 0, i6 = 0, i7 = 0, i8 = 0, i9 = 0, i10 = 0
    ) {
        return {
            // Mapping ke model alpine
            n1: i1,
            n2: i2,
            n3: i3,
            n4: i4,
            n5: i5,
            n6: i6,
            n7: i7,
            n8: i8,
            n9: i9,
            n10: i10,

            rataRata: 0,
            predikatFull: 'Menunggu Input',
            colorClass: 'bg-gray-500 text-white',

            calculate() {
                // Parse Float semua input (jaga-jaga string/null jadi 0)
                let val1 = parseFloat(this.n1) || 0;
                let val2 = parseFloat(this.n2) || 0;
                let val3 = parseFloat(this.n3) || 0;
                let val4 = parseFloat(this.n4) || 0;
                let val5 = parseFloat(this.n5) || 0;
                let val6 = parseFloat(this.n6) || 0;
                let val7 = parseFloat(this.n7) || 0;
                let val8 = parseFloat(this.n8) || 0;
                let val9 = parseFloat(this.n9) || 0;
                let val10 = parseFloat(this.n10) || 0;

                // Hitung Total & Rata-rata
                let total = val1 + val2 + val3 + val4 + val5 + val6 + val7 + val8 + val9 + val10;
                let avg = total / 10;

                // Format desimal (jika koma, ambil 2 digit)
                this.rataRata = Number.isInteger(avg) ? avg : avg.toFixed(2);

                // Logic Predikat
                if (total === 0) {
                    this.predikatFull = 'Menunggu Input';
                    this.colorClass = 'bg-gray-500 text-white';
                } else if (avg >= 90) {
                    this.predikatFull = 'A (Sangat Baik)';
                    this.colorClass = 'bg-green-600 text-white';
                } else if (avg >= 80) {
                    this.predikatFull = 'B (Baik)';
                    this.colorClass = 'bg-blue-600 text-white';
                } else if (avg >= 70) {
                    this.predikatFull = 'C (Cukup)';
                    this.colorClass = 'bg-yellow-400 text-yellow-900';
                } else {
                    this.predikatFull = 'D (Kurang)';
                    this.colorClass = 'bg-red-600 text-white';
                }
            }
        }
    }
</script>
