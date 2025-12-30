<footer class="page-footer">
    <p class="mb-0">Copyright © 2025. All right reserved Dept. of Operations, FHQ, Abuja.</p>
</footer>

<script>
    // Year picker initialization
    const select = document.getElementById('year_picker');
    if (select) {
        const currentYear = new Date().getFullYear();
        const startYear = 2010; // Adjust the start year as needed

        // Clear existing options except the first one
        while (select.options.length > 1) {
            select.remove(1);
        }

        for (let i = currentYear; i >= startYear; i--) {
            const option = document.createElement('option');
            option.value = i;
            option.textContent = i;
            select.appendChild(option);
        }
    }

    // Mobile enhancements and form validation
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize all year pickers
        const yearPickers = document.querySelectorAll('[id^="year_picker"]');
        yearPickers.forEach(picker => {
            if (!picker.hasAttribute('data-initialized')) {
                const currentYear = new Date().getFullYear();
                const startYear = 2010;
                
                // Clear existing options except the first one
                while (picker.options.length > 1) {
                    picker.remove(1);
                }
                
                for (let i = currentYear; i >= startYear; i--) {
                    const option = document.createElement('option');
                    option.value = i;
                    option.textContent = i;
                    picker.appendChild(option);
                }
                picker.setAttribute('data-initialized', 'true');
            }
        });

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
        
        // Form validation for monthly trend modal
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
                    
                    // Check if error modal exists
                    let errorModal = document.getElementById('validationErrorModal');
                    if (!errorModal) {
                        // Create error modal
                        errorModal = document.createElement('div');
                        errorModal.className = 'modal fade';
                        errorModal.id = 'validationErrorModal';
                        errorModal.innerHTML = `
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title">Validation Error</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger mb-0" id="errorMessage"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        `;
                        document.body.appendChild(errorModal);
                    }
                    
                    // Set error message
                    document.getElementById('errorMessage').textContent = errorMessage;
                    
                    // Show modal
                    const modal = new bootstrap.Modal(errorModal);
                    modal.show();
                    
                    return false;
                }
            });
        }

        // Mobile table enhancements
        function enhanceMobileTables() {
            if (window.innerWidth <= 768) {
                // Add vertical headers to all table headers
                document.querySelectorAll('table th').forEach(th => {
                    if (!th.classList.contains('vertical-header')) {
                        th.classList.add('vertical-header');
                    }
                });
                
                // Make all tables responsive
                document.querySelectorAll('table').forEach(table => {
                    if (!table.classList.contains('table-responsive')) {
                        const wrapper = document.createElement('div');
                        wrapper.className = 'table-responsive';
                        table.parentNode.insertBefore(wrapper, table);
                        wrapper.appendChild(table);
                    }
                });
            } else {
                // Remove vertical headers on desktop
                document.querySelectorAll('.vertical-header').forEach(th => {
                    th.classList.remove('vertical-header');
                });
            }
        }

        // Initial call
        enhanceMobileTables();
        
        // Re-run on resize
        window.addEventListener('resize', enhanceMobileTables);
    });
</script>