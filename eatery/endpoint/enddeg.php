<?php
require_once( "sparqlib.php" );

$db = sparql_connect( "http://localhost:3030/tugasbesar/query" );
if( !$db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }

sparql_ns( "foaf","http://xmlns.com/foaf/0.1/" );
sparql_ns("rdf", "http://www.w3.org/1999/02/22-rdf-syntax-ns#");
sparql_ns("rdfs", "http://www.w3.org/2000/01/rdf-schema#");

# filename: ex070.rq

  $sparql = "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
  prefix dbp:   <http://dbpedia.org/property/> 
  prefix foaf:  <http://xmlns.com/foaf/0.1/>
  prefix dc: <http://purl.org/dc/terms/>
  prefix sn: <http://www.snee.com/hr/>

  SELECT  ?name ?abstract
  WHERE {
    ?stTemp foaf:name ?name.
    ?stTemp dc:abstract ?abstract .
    FILTER(?name = 'Degan Septoadji') 
  }
  ";

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
        print "$row[$field]";
    }
    print "</tr>";
}
print "</table>";

?>