<?

class Pagination
{
	private $itemsCount, $countOnPage, $activePage, $lihksCount, $paginationPath;
	public function __construct($itemsCount, $countOnPage, $activePage, $paginationPath)
	{
		$this->itemsCount = $itemsCount;
		$this->countOnPage = $countOnPage;
		$this->activePage = $activePage;
		$this->lihksCount = ceil($itemsCount/$countOnPage);
		$this->paginationPath = $paginationPath;
	}
	public function show()
	{
	    if($this->lihksCount <= 5) {
			echo "$this->lihksCount";
			$min = 1;
			$max = $this->lihksCount;
		for($i = min; $i <= max; $i++){
			if($this->activePage==$i) {
				$x.="<li class='page-item active' aria-current='page'><span class='page-link'>$i<span class='sr-only'>(current)</span></span></li>";
			} else {
			    $x.="<li class='page-item'><a class='page-link' href='".$this->paginationPath."$i'>$i</button></a>";
			}
		}
	    } else if($this->activePage >= $this->lihksCount - 2) {
			$min = $this->lihksCount - 4;
			$max = $this->lihksCount;	
			$leftArrow = "<li class='page-item'><a class='page-link'href='".$this->paginationPath."1'>First</a></li>
						  <li class='page-item'><a class='page-link' href='".$this->paginationPath.($this->activePage-1)."'>Prev</a></li>";
			$rightArrow = "";
	    } else if($this->activePage <= 3) {
			$min = 1;
			$max = 5;
			$leftArrow = "";
			$rightArrow = "<li class='page-item'><a class='page-link' href='".$this->paginationPath.($this->activePage+1)."'>Next</a></li>
						   <li class='page-item'><a class='page-link' href='".$this->paginationPath.$this->lihksCount."'>Last</a></li>";
	    } else {
			$min = $this->activePage - 2;
			$max = $this->activePage + 2;
			$leftArrow = "<li class='page-item'><a class='page-link' href='".$this->paginationPath."1'>First</a></li>
						  <li class='page-item'><a class='page-link' href='".$this->paginationPath.($this->activePage-1)."'>Prev</a></li>";
			$rightArrow = "<li class='page-item'><a class='page-link'  href='".$this->paginationPath.($this->activePage+1)."'>Next</a></li>
						   <li class='page-item'><a class='page-link' href='".$this->paginationPath.$this->lihksCount."'>Last</a></li>";
		}	
		$x = "<nav aria-label='Page navigation example'><ul class='pagination justify-content-center'>";
		$x .= $leftArrow;
		
		for($i = $min; $i <= $max; $i++){
			if($this->activePage==$i) {
				$x.="<li class='page-item active' aria-current='page'><span class='page-link'>$i<span class='sr-only'>(current)</span></span></li>";
			} else {
				$x.="<li class='page-item'><a class='page-link' href='".$this->paginationPath."$i'>$i</a></li>";
			}
		}
		$x .= $rightArrow;
		$x .= "</ul></nav>";
		return $x;
	}
}