<?php
/**
 * Klasa ta odpowiada za przetworzenie pliku widoku wraz z przekazanymi danymi i udostępnienie go do wyrenderowania
 */
class View {

	private $output = '';
	private $result = array();
	private $params = array();
	/*
	 * $templateFileName - nazwa pliku z widokiem
	 * $variables - tablica z danymi do wygenerowania widoku (nazwa_zmiennej => wartość)
	 */
	function __construct($templateFileName, $variables = array(), $params = array()) {
		
		/* utworzenie zmiennych lokalnych dostępnych dla pliku widoku */
		//extract($variables);

		$this->result = $variables;
		$this->params = $params;

		/* rozpoczęcie rejestrowania renderu widoku do bufora (zamiast na wyjście, na wyjście wyślemy go na sam koniec dziłania) */
        ob_start();
         /* renderowanie widoku */
        $filename = INDEX_DIR."/view/$templateFileName.tpl.php";
        include($filename);

        /* przypisanie renderu widoku do zmiennej */
        $this->output = ob_get_contents();

        /* zamknięcie rejestru do bufora i przywrócenie normalnego dziąłania skryptów */
        ob_end_clean();
	}

	/**
	 * zwraca wyrenderowany widok, jest to wykorzystanie specjalnej funkcji, która jest wywoływana gdy obiekt jest wykorzystany w funkcjach typu echo() lub przy konkatenacji tekstów
	 */
	public function __toString() {
		return $this->output;
	}
}
