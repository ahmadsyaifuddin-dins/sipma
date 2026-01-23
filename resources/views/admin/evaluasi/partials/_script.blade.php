<script>
    function calculator(initN1 = 0, initN2 = 0, initN3 = 0, initN4 = 0) {
        return {
            n1: initN1,
            n2: initN2,
            n3: initN3,
            n4: initN4,
            rataRata: 0,
            predikatFull: 'Menunggu Input',
            colorClass: 'bg-gray-500 text-white',

            calculate() {
                let val1 = parseFloat(this.n1) || 0;
                let val2 = parseFloat(this.n2) || 0;
                let val3 = parseFloat(this.n3) || 0;
                let val4 = parseFloat(this.n4) || 0;

                let total = val1 + val2 + val3 + val4;
                let avg = total / 4;
                this.rataRata = Number.isInteger(avg) ? avg : avg.toFixed(2);

                if (val1 == 0 && val2 == 0 && val3 == 0 && val4 == 0) {
                    this.predikatFull = 'Menunggu Input';
                    this.colorClass = 'bg-gray-500 text-white';
                } else if (avg >= 90) {
                    this.predikatFull = 'A (Sangat Baik)';
                    this.colorClass = 'bg-green-500 text-white';
                } else if (avg >= 80) {
                    this.predikatFull = 'B (Baik)';
                    this.colorClass = 'bg-blue-500 text-white';
                } else if (avg >= 70) {
                    this.predikatFull = 'C (Cukup)';
                    this.colorClass = 'bg-yellow-400 text-yellow-900';
                } else {
                    this.predikatFull = 'D (Kurang)';
                    this.colorClass = 'bg-red-500 text-white';
                }
            }
        }
    }
</script>
