<?php

function debug (array $tab){
  echo '<pre>';
  echo print_r($tab);
  echo '<pre>';
}
function imageMovie($movie)
{
    return '<img src="posters/' .$movie['id']. '.jpg" alt="' .$movie['title'].'">';
}
