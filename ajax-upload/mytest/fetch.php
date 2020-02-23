<?php

include 'data/db.php';

$ordinal = $_POST['ordinal'];

$data = DB::getNextSet();
$data = json_decode($data);

// $html = formatTableRow([ $ordinal, rand(100, 5000) ]);
$html = formatTableRow2($data);

echo $html;

function formatTableRow($data)
{
  $text = "<tr id='row-$data[0]'>
             <td>
               $data[0]
             </td>
             <td>
               Alguna descripción
             </td>
             <td>
               $ " . number_format($data[1], 2, ',', '.') . "
             </td>
             <td>
               <a href='' class='btn small' data-rowId='row-$data[0]' onclick='removeRow(this);'>Quitar</a>
             </td>
           </tr>";

  return $text;
}

function formatTableRow2($data)
{
  $text = "";

  foreach ($data as $row)
  {
    $id = $row->customer_id;
    $name = $row->first_name . ' ' . $row->last_name;
    $email = $row->email;

    $text .= "<tr id='row-$id'>
              <td>
                $id
              </td>
              <td>
                $name
              </td>
              <td>
                $email
              </td>
              <td>
                <a href='' class='btn small' data-rowId='row-$id' onclick='removeRow(this);'>Quitar</a>
              </td>
            </tr>";
  }

  return $text;
}
