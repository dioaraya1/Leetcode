<!-- Mencari nama yang sama -->
<?php

function cariNamaDuplikat($nama, $target)
{

  $map = [];

  foreach ($nama as $i => $name) {
    if ($name == $target) {
      if (isset($map[$name])) {
        return [$map[$name], $i];
      }
      $map[$name] = $i;
    }
  }

  return [];
}

print_r(cariNamaDuplikat(["Dio", "Dicky", "Dio", "Akai", "Dio"], "Akai"));