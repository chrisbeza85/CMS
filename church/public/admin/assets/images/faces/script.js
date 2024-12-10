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

