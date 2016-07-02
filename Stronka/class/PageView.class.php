<?php
/**
 * Klasa odpowiedzialna za render strony oraz poszczególnych jej elementów
 */
 
class PageView {

	private $template;
	private $views = array();

	public function __construct($templateFileName) {
		$this->template = $templateFileName;
	}

	public function addView(View $view) {
		$this->views[] = $view;
	}

	/**
	 * zwraca wyrenderowany widok, jest to wykorzystanie specjalnej funkcji, która jest wywoływana gdy obiekt jest wykorzystany w funkcjach typu echo() 
     * lub przy konkatenacji tekstów
	 */
     
	public function __toString() {
		
		$views = $this->views;
		$filename = INDEX_DIR."/view/". $this->template . ".tpl.php";

		ob_start();
        include($filename);
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
	}
}
