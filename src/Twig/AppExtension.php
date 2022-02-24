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
                    <svg class='bd-placeholder-img card-img-top' width='100%' height='225' xmlns='http://www.w3.org/2000/svg' role='img' preserveAspectRatio='xMidYMid slice' focusable='false'>
                        <a class='text-white nav-link' href='./".$href."'>
                        <rect width='100%' height='100%' fill='#55595c'/>
                        <text x='30%' y='50%' fill='#eceeef' dy='.3em'>".$name."</text>
                    </svg>
                </div>
            </div>";
        }
    }
?>