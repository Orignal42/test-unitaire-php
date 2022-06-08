<?php
	
use PHPUnit\Framework\TestCase; 
use App\Article;
class ArticleTest extends \PHPUnit\Framework\TestCase {

	protected $article;

	public function testTitleIsEmptyByDefault() {
        
        $article= new Article;
        $title = $article->title;
        $this->assertEmpty($title);
    }

    public function testSlugIsEmtpyWithNoTile() {
        $article= new Article;
        $slug=$article->getSlug();
        $this->assertEmpty($slug);
    }

    public function provider() {
    	return array(
    		"testSlugHasSpacesReplacedByUnderscores" => array("An example article", "An_example_article"),
    		"testSlugHasWhitespaceReplaceBySingleUnderscore" => array("An     example  \n   article", "An_example_article"),
    		"testSlugdoesNotStartOrEndWithAnUnderscore" => array(" An example article ", "An_example_article"),
    		"testSlugDoesNotHaveAnyNonWordCharacters" => array("Read! This! Now!", "Read_This_Now"),
    	);
    }

 
    /**
     * @dataProvider provider
     */
    public function testSlug($title, $slug) {
        $article = new Article;
        $article->title = $title;
        
        $this->assertSame($slug,$article->getSlug());
    }
}
	
?>

<!-- .\vendor\bin\phpunit .\tests\ArticleTest.php
 -->