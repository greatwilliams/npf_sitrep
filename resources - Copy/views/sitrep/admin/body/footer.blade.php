<footer class="page-footer">
			<p class="mb-0">Copyright © 2025. All right reserved Dept. of Operations, FHQ, Abuja.</p>
		</footer>
<script>
		const select = document.getElementById('year_picker');
const currentYear = new Date().getFullYear();
const startYear = 2010; // Adjust the start year as needed

for (let i = currentYear; i >= startYear; i--) {
    const option = document.createElement('option');
    option.value = i;
    option.textContent = i;
    select.appendChild(option);
}
</script>


<script>
document.addEventListener('DOMContentLoaded', function() {
    // Month validation - ensure start month <= end month
    const startMonth = document.getElementById('start_month');
    const endMonth = document.getElementById('end_month');
    
    if (startMonth && endMonth) {
        startMonth.addEventListener('change', function() {
            const startVal = parseInt(this.value);
            const endVal = parseInt(endMonth.value);
            
            if (endVal && startVal > endVal) {
                endMonth.value = startVal;
            }
        });
        
        endMonth.addEventListener('change', function() {
            const endVal = parseInt(this.value);
            const startVal = parseInt(startMonth.value);
            
            if (startVal && endVal < startVal) {
                startMonth.value = endVal;
            }
        });
    }
    
    // Form validation
    const form = document.querySelector('#monthlyTrendModal form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const crimeType = form.querySelector('[name="crime_type"]');
            const startMonth = form.querySelector('[name="start_month"]');
            const endMonth = form.querySelector('[name="end_month"]');
            const year = form.querySelector('[name="year"]');
            
            let isValid = true;
            let errorMessage = '';
            
            if (!crimeType.value) {
                errorMessage = 'Please select a crime type';
                isValid = false;
            } else if (!startMonth.value) {
                errorMessage = 'Please select a start month';
                isValid = false;
            } else if (!endMonth.value) {
                errorMessage = 'Please select an end month';
                isValid = false;
            } else if (!year.value) {
                errorMessage = 'Please select a year';
                isValid = false;
            } else if (parseInt(startMonth.value) > parseInt(endMonth.value)) {
                errorMessage = 'Start month cannot be after end month';
                isValid = false;
            }
            
            if (!isValid) {
                e.preventDefault();
                alert(errorMessage);
                return false;
            }
        });
    }
});
</script>



