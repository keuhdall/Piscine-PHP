#!/usr/bin/php
<?php
	while (1) {
		print("Entrez un nombre: ");
		$var = fgets(STDIN);
		if ($var == NULL)
			break;
		$var = rtrim($var);
		if (is_numeric($var) == false)
			print("'$var' n'est pas un chiffre\n");
		else
		{
			if ($var % 2 == 0)
				print("Le chiffre $var est Pair\n");
			else
				print("Le chiffre $var est Impair\n");
		}
	}
	print("\n");
?>