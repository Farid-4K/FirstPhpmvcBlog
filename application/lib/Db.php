<?php
namespace application\lib;

require_once ROOT."/application/lib/rb.php";
use R;
class Db extends R
{
	public function __construct()
	{
		R::setup( 'mysql:host=localhost;dbname=blog', 'root', '123' );
		// R::setup( 'mysql:host=localhost;dbname=id4768278_goldenhands', 'id4768278_farid5ip50gmailcom', '1938666farid' );
		if ( !R::testConnection() )
			{
				exit ('Нет соединения с базой данных');
			}
		}
	}
