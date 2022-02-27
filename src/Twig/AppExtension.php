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

        public function cardConstruction(string $name)
        {
            $href = str_replace(" / ", "&", $name);
            echo "
            <div class='col' style='text-align:center;'>
                <div class='card shadow-sm'>
                    <p><a class='text-dark nav-link' href='./".$href."'>".$name."</a></p>
                </div>
            </div>";
        }
    }
?>