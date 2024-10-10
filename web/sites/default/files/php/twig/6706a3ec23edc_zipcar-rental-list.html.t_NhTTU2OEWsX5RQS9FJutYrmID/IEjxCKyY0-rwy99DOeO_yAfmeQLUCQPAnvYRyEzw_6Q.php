<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* modules/custom/zipcar_rental/templates/zipcar-rental-list.html.twig */
class __TwigTemplate_321fcfa25349ecddd5ece1df8df61468 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<div class=\"zipcar-container\">
        <div class=\"logo\">
        ";
        // line 3
        $context["module_path"] = Twig\Extension\CoreExtension::split($this->env->getCharset(), $this->sandbox->ensureToStringAllowed($this->getTemplateName(), 3, $this->source), "/templates");
        // line 4
        yield "            <img src=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 4, $this->source) . $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 4, $this->source)), "html", null, true);
        yield "/images/logo.png\" alt=\"Zipcar logo\">
        </div>
        
        <h1>";
        // line 7
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Search for a car"));
        yield "</h1>
        <form class=\"search-form\" id=\"zipcar-rental-form\">
            <label for=\"hours\">";
        // line 9
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("How many hours would you like to rent the Zipcar?"));
        yield "</label>
            <input type=\"text\" id=\"zipcar-rental-hours\" ";
        // line 10
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "setAttribute", ["placeholder", t("Enter number of hours")], "method", false, false, true, 10), 10, $this->source), "html", null, true);
        yield " >
            <button type=\"submit\">";
        // line 11
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Submit"));
        yield "</button>
        </form>
        
        <div class=\"search-results\">
            <h2>";
        // line 15
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Search results"));
        yield "</h2>
            
            <div class=\"search-bar\">
                <input type=\"text\" id=\"zipcar-rental-search\" ";
        // line 18
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "setAttribute", ["placeholder", t("Search by name here")], "method", false, false, true, 18), 18, $this->source), "html", null, true);
        yield ">
            </div>
            
            <div id=\"zipcar-rental-results\"></div>
            
        </div>
    </div>";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["_self", "base_path", "directory", "attributes"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/zipcar_rental/templates/zipcar-rental-list.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  83 => 18,  77 => 15,  70 => 11,  66 => 10,  62 => 9,  57 => 7,  50 => 4,  48 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/zipcar_rental/templates/zipcar-rental-list.html.twig", "/var/www/html/zipcar/web/modules/custom/zipcar_rental/templates/zipcar-rental-list.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 3);
        static $filters = array("split" => 3, "escape" => 4, "t" => 7);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['split', 'escape', 't'],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
