<?php

namespace Website\CommonBundle\Entity;

trait BaseTrait {

    public function getId() {
        return $this->id;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setSlug($slug) {
        $this->slug = $slug;
    }

    public function getSlug() {
        return $this->slug;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getContent() {
        return $this->content;
    }

    public function setFeatured($featured) {
        $this->featured = $featured;
    }

    public function getFeatured() {
        return $this->featured;
    }

    public function setTranslatableLocale($locale) {
        $this->locale = $locale;
    }

    public function setPublished($published) {
        $this->published = intval($published);
    }

    public function setDatePublished($datePublished) {
        $this->datePublished = $datePublished;
    }

    public function getPublished() {
        return (bool) $this->published;
    }

    public function getDateDeleted() {
        return $this->dateDeleted;
    }

    public function setDateDeleted($dateDeleted) {
        $this->dateDeleted = $dateDeleted;
    }

    public function getDatePublished() {
        return $this->datePublished;
    }

    public function getDateModified() {
        if ($this->dateModified != '0000-00-00 00:00:00') {
            return $this->dateModified;
        }

        return $this->datePublished;
    }

//    public function getClassName($lowercase = true) {
//        $function = new \ReflectionClass($this);
//
//        if ($lowercase) {
//            return strtolower($function->getShortName());
//        }
//
//        return $function->getShortName();
//    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($author) {
        if ($author instanceof User) {
            $this->author = $author;
        }
    }

    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    public function getType() {
        return $this->type;
    }

    public function setPosition($position) {
        $this->position = $position;
    }

    public function getPosition() {
        return $this->position;
    }

    public function getLvl() {
        return $this->lvl;
    }

    public function getRoot() {
        return $this->root;
    }

    public function getChildren() {
        return $this->children;
    }

    public function setPrice($price) {
        $this->price = floatval($price);
    }

    public function getPrice() {
        return $this->price;
    }

    public function getExcerpt() {
        return $this->excerpt;
    }

    public function setExcerpt($excerpt) {
        $this->excerpt = $excerpt;
    }

    public function setKey($key) {
        $this->key = $key;
    }

    public function getKey() {
        return $this->key;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setValue($value) {
        $this->value = $value;
    }

    public function getValue() {
        return $this->value;
    }

    public function getEntityClass() {
        return basename(basename(str_replace('\\', '/', get_class($this))));
    }

}
