<?php

namespace App\Services;

use Illuminate\Support\Facades\Request;

class SeoService
{
    protected $data = [];
    protected $schema = [];

    public function __construct()
    {
        // Default values
        $this->data = [
            'title' => config('seo.default_title', 'AMN Global Law Firm'),
            'description' => config('seo.default_description', 'Leading law firm in Saudi Arabia providing expert legal services.'),
            'image' => config('seo.default_image', asset('img/logo.png')),
            'type' => 'website',
            'url' => Request::url(),
            'site_name' => config('seo.site_name', 'AMN Global Law Firm'),
            'locale' => app()->getLocale(),
            'twitter_card' => 'summary_large_image',
            'keywords' => config('seo.default_keywords', ''),
        ];
    }

    public function setTitle($title)
    {
        $this->data['title'] = $title . ' | ' . $this->data['site_name'];
        return $this;
    }

    public function setDescription($description)
    {
        $this->data['description'] = $description;
        return $this;
    }

    public function setImage($image)
    {
        $this->data['image'] = $image;
        return $this;
    }

    public function setType($type)
    {
        $this->data['type'] = $type;
        return $this;
    }

    public function setKeywords($keywords)
    {
        $this->data['keywords'] = is_array($keywords) ? implode(', ', $keywords) : $keywords;
        return $this;
    }

    public function addSchema($schemaData)
    {
        $this->schema[] = $schemaData;
        return $this;
    }

    public function generateTags()
    {
        $html = [];
        
        // Basic Meta
        $html[] = '<title>' . e($this->data['title']) . '</title>';
        $html[] = '<meta name="description" content="' . e($this->data['description']) . '">';
        $html[] = '<meta name="keywords" content="' . e($this->data['keywords']) . '">';
        $html[] = '<link rel="canonical" href="' . e($this->data['url']) . '">';
        
        // Open Graph
        $html[] = '<meta property="og:title" content="' . e($this->data['title']) . '">';
        $html[] = '<meta property="og:description" content="' . e($this->data['description']) . '">';
        $html[] = '<meta property="og:image" content="' . e($this->data['image']) . '">';
        $html[] = '<meta property="og:url" content="' . e($this->data['url']) . '">';
        $html[] = '<meta property="og:type" content="' . e($this->data['type']) . '">';
        $html[] = '<meta property="og:site_name" content="' . e($this->data['site_name']) . '">';
        $html[] = '<meta property="og:locale" content="' . e($this->data['locale']) . '">';

        // Twitter Card
        $html[] = '<meta name="twitter:card" content="' . e($this->data['twitter_card']) . '">';
        $html[] = '<meta name="twitter:title" content="' . e($this->data['title']) . '">';
        $html[] = '<meta name="twitter:description" content="' . e($this->data['description']) . '">';
        $html[] = '<meta name="twitter:image" content="' . e($this->data['image']) . '">';

        // Geo Tags for Local SEO
        if (config('seo.geo.enabled', true)) {
            $html[] = '<meta name="geo.region" content="' . config('seo.geo.region', 'SA-01') . '">';
            $html[] = '<meta name="geo.placename" content="' . config('seo.geo.placename', 'Riyadh') . '">';
            $html[] = '<meta name="geo.position" content="' . config('seo.geo.position', '24.7136;46.6753') . '">';
            $html[] = '<meta name="ICBM" content="' . config('seo.geo.position', '24.7136, 46.6753') . '">';
        }

        return implode("\n    ", $html);
    }

    public function generateSchema()
    {
        if (empty($this->schema)) {
            return '';
        }

        $json = json_encode([
            '@context' => 'https://schema.org',
            '@graph' => $this->schema
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        return '<script type="application/ld+json">' . $json . '</script>';
    }
}
