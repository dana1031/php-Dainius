<?php

$roll_joints = true;

$joint1 = &$roll_joints;
$joint2 = &$joint1;
$joint3 = &$joint2;

print $joint1; //1
print $joint2; //1
print $joint3; //1