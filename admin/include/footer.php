<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- dashboard init -->
<script src="assets/js/pages/dashboard.init.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<!-- App js -->
<script src="assets/js/app.js"></script>
<!-- Script for the slug generation -->
<script>
    $("#title").keyup(function() {
        
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
        $("#slug").val(Text);
    });
</script>
<script>

const input1 = document.querySelector('#image-input1');
input1.addEventListener('change', () => {
    // Code to preview image
    const file = input1.files[0];
    const maxSize = 1000 * 1024; // 500KB in bytes

    if (file && file.size > maxSize) {
        alert('File size must not exceed 1 MB.');
        input1.value = ''; // Clear the file input
    } else {
        const reader = new FileReader();
        reader.addEventListener('load', () => {
            document.querySelector('#image-preview1').setAttribute('src', reader.result);
        });
        reader.readAsDataURL(file);
    }
});

   
   
   const input2= document.querySelector('#image-input2');
   input2.addEventListener('change', () => {
     // Code to preview image
     const file = input2.files[0];
      const maxSize = 1000 * 1024; // 500KB in bytes

    if (file && file.size > maxSize) {
        alert('File size must not exceed 1 MB.');
        input1.value = ''; // Clear the file input
    } else {
     
     
      const reader = new FileReader();
       reader.addEventListener('load', () => {
         document.querySelector('#image-preview2').setAttribute('src', reader.result);
       });
       reader.readAsDataURL(file);
   }
   });
</script>

 <script>
    CKEDITOR.replace('metaDesc');
    CKEDITOR.replace('propDesc');
    CKEDITOR.replace('propertyPrice');
    CKEDITOR.replace('locationAdvantage');
    CKEDITOR.replace('keyFeature');
    CKEDITOR.replace('ShortDesc');
    CKEDITOR.replace('blog_description');
    </script>
<script>
    
    var loop_count = 1;
    function add_more(){
       
      loop_count++;
      var html = '<div class="row mb-3" id ="property_floor_' + loop_count + '">';
          html += '<div class="col-md-6">';
          html += '<input class="form-control" type="file" name="floor_image[]" onchange="validateFileSize(this)" id="image-input2">';
          html += '</div>';
          html += '<div class="col-md-6">';
          html += '<input class="form-control" type="text" name="floor_name[]" id="image-input2" placeholder ="Enter Floor Name">';
          html += '</div>';
          
          html +='<div class="col-md-6 pt-3"><button class="btn btn-danger btn-sm" type="button" onclick="remove_more('+loop_count+');">Remove</button></div>';
          html += '</div>';
      
    
     $('#floor_box').append(html);

    }
    function remove_more(id){
          $("#property_floor_" + id).remove();
    }
    
    
    var loop_gallery_count = 1;
    function add_more_gallery(){
        loop_gallery_count++;
        var html = '<div class="row mb-3" id="property_gallery_'+loop_gallery_count+'">';
        html += '<div class="col-md-6">';
        html += '<input class="form-control" type="file" name="gallery_image[]" onchange="validateFileSize(this)" id="image-input2" required></div>';
        html += '<div class="col-md-6">';
        html += '<button class="btn btn-danger btn-sm " type="button" onclick="remove_more_gallery('+loop_gallery_count+');">Remove</button></div>';
        html += '</div>';
        
        $('#gallery_box').append(html);

    
    }
    function remove_more_gallery(id){
          $("#property_gallery_" + id).remove();
    }
    
    let table = new DataTable('#datatable-buttons', {
    // options
});




</script>
<script>
//     $(document).ready(function () {
//     $('#image-input1').on('change', function () {
//         const file = this.files[0];
//         const maxSize = 500 * 1024; // 500KB in bytes

//         if (file && file.size > maxSize) {
//             alert('File size must not exceed 500KB.');
//             this.value = ''; // Clear the file input
//         }
//     });
// });
</script>



<script>
    // Pass PHP data to JavaScript
    const types = <?php echo json_encode($types); ?>;
    const counts = <?php echo json_encode($counts); ?>;

    // Create the bar chart
    const ctx = document.getElementById('propertyBarChart').getContext('2d');
    const propertyBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: types,
            datasets: [{
                label: 'Number of Properties',
                data: counts,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                title: {
                    display: true,
                    text: 'Number of Properties by Property Type'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Count'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Property Type'
                    }
                }
            }
        }
    });
</script>
<script>
  function validateFileSize(input) {
    const file = input.files[0];  // Get the selected file
    const maxSize = 1000 * 1024;  // Maximum size in bytes (500 KB)

    if (file) {
      if (file.size > maxSize) {
        alert('The file size must not exceed 1 MB.');
        input.value = '';  // Clear the input field if the file is too large
      }
    }
  }
</script>

</body>
</html>