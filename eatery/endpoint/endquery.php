<?php
require_once( "sparqlib.php" );

$db = sparql_connect( "http://localhost:3030/querykellain/query" );
if( !$db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }

sparql_ns( "foaf","http://xmlns.com/foaf/0.1/" );
sparql_ns("rdf", "http://www.w3.org/1999/02/22-rdf-syntax-ns#");
sparql_ns("rdfs", "http://www.w3.org/2000/01/rdf-schema#");

# filename: ex070.rq

  $sparql = "prefix foo: <https://semanticresto.com/> 
  prefix rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#> 
  prefix foaf: <http://xmlns.com/foaf/0.1/>
  select ?name ?price ?ingredients ?category ?url
  where{ 
  ?food foaf:name ?name .
  ?food foaf:price ?price .
  ?food foaf:ingredients ?ingredients .
  ?food foaf:category ?category .
  ?food foaf:url ?url .
 
  }";

   $result = sparql_query( $sparql ); 
   $fields = sparql_field_array( $result );

//print "<p>Number of rows: ".sparql_num_rows( $result )." results.</p>";
print "<table class='table table-striped'>";
print "<tr>";
foreach( $fields as $field )
{
}
print "</tr>";
while( $row = sparql_fetch_array( $result ) )
{
    print "<tr>";
    foreach( $fields as $field )
    {
        print "<td>$row[$field]</td>";
    }
    print "</tr>";
}
print "</table>";

?>