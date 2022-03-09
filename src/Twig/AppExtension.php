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
                new TwigFunction('jsonCards', [$this, 'jsonCardConstruction']),
            ];
        }

        public function jsonCardConstruction(string $card)
        {
            echo "
            <div class='col' style='text-align:center;'>
                <div class='card shadow-sm'>
                    <p><a class='text-dark nav-link' href='http://hh.yourdwell.ru/".$card."'>".$card."</a></p>
                </div>
            </div>";
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