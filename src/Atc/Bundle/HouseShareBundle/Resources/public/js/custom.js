//Tooltip
$('a').tooltip('hide');

//Popover
$('.popover-pop').popover('hide');

//Collapse
$('#myCollapsible').collapse({
  toggle: false
})

//Dropdown
$('.dropdown-toggle').dropdown();


// Retina Mode
function retina(){
  retinaMode = (window.devicePixelRatio > 1);
  return retinaMode;
}




// Date Time
setInterval(function(){ 
  date = '<span class="big">' + moment().format('MMMM Do YYYY') + '</span><span>' + moment().format('ddd hh:mm:ss a') + '</span>'
  $("#date-time").html(date)
}, 1000);
