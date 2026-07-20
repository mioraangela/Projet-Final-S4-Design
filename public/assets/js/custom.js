// Custom JS for UI enhancements
document.addEventListener('DOMContentLoaded', function(){
  // ensure dropdowns on hover for large screens
  if(window.matchMedia('(min-width: 992px)').matches){
    var dropdowns = document.querySelectorAll('.navbar .dropdown');
    dropdowns.forEach(function(dd){
      dd.addEventListener('mouseenter', function(){
        var a = dd.querySelector('.dropdown-toggle');
        var bs = bootstrap.Dropdown.getOrCreateInstance(a);
        bs.show();
      });
      dd.addEventListener('mouseleave', function(){
        var a = dd.querySelector('.dropdown-toggle');
        var bs = bootstrap.Dropdown.getOrCreateInstance(a);
        bs.hide();
      });
    });
  }
});
