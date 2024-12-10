document.addEventListener('DOMContentLoaded', function () {
    const inputs = document.querySelectorAll('.input, .input_1');



    inputs.forEach(input => {
        input.addEventListener('focus', function () {
            this.classList.add('not-empty');
        });

        input.addEventListener('blur', function () {
            if (this.value === '') {
                this.classList.remove('not-empty');
            } else {
                this.classList.add('not-empty');
            }
        });

        // Initialize the class based on the input's current value
        if (input.value !== '') {
            input.classList.add('not-empty');
            input.classList.remove('empty');
        }
    });
});

function searchTable() {
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("search-input");
    filter = input.value.toLowerCase();
    table = document.getElementById("example");
    tr = table.getElementsByTagName("tr");

    for (i = 1; i < tr.length; i++) {
        tr[i].style.display = "none";
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toLowerCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break;
                }
            }
        }
    }
}


