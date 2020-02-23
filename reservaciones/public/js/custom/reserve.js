$('#reserve-btn').click(bookRoom);

function bookRoom(ev)
{
  let radioBtns = $('input[type=radio]');
  let jsonData = radioBtns
    .filter((i) => radioBtns[i].checked)
    .attr('data-reservation');

  ev.preventDefault();
  $('#reservation-data').attr('value', jsonData);
  $('#reservation-form').submit();
}
