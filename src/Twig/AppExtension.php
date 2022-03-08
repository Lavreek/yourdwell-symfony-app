<?php
    // src/Twig/AppExtension.php
    namespace App\Twig;

    use Twig\Extension\AbstractExtension;
    use Twig\TwigFunction;

    class AppExtension extends AbstractExtension
    {
        public function getFunctions()
        {
            return [
                new TwigFunction('placeCards', [$this, 'cardConstruction']),
            ];
        }

        public function cardConstruction(array $cards)
        {
            echo "
            <div class='col' style='text-align:center;'>
                <div class='card shadow-sm'>
                    <p><a class='text-dark nav-link' href='./".$cards['href']."'>".$cards['value']."</a></p>
                </div>
            </div>";
        }
    }
?>