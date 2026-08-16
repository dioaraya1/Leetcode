<?php
function twoSum($nums, $target)
{
  $map = [];
  foreach ($nums as $i => $num) {
    $complement = $target - $num;
    if (isset($map[$complement])) {
      return [$map[$complement], $i];
    }
    $map[$num] = $i;
  }
  return [];
}

print_r(twoSum([1, 3, 5, 7], 4));

?>