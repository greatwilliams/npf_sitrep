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
