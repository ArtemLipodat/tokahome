<?php

namespace App\Models\Behaviors;

trait HasSlug {
    use \A17\Twill\Models\Behaviors\HasSlug;

    /**
     * @throws \Exception
     */
    public function handleSlugsOnSave(): void
    {
        if ($this->twillSlugData === []) {
            return;
        }

        foreach (getLocales() as $locale) {
            $this->disableLocaleSlugs($locale);
        }

        $slugParams = $this->twillSlugData !== [] ? $this->twillSlugData : $this->getSlugParams();

        foreach ($slugParams as $params) {
            if ($this->slugs()->where('locale', $params['locale'])->where('slug', $params['slug'])->where('active', true)->doesntExist()) {
                $this->updateOrNewSlug($params);
            }
        }
    }

    public function updateOrNewSlug(array $slugParams): void
    {
        if (
            (($oldSlug = $this->getExistingSlug($slugParams, true)) !== null)
            && ($slugParams['slug'] === $this->suffixSlugIfExisting($slugParams))
        ) {
            if (!$oldSlug->active && ($slugParams['active'] ?? false)) {
                $this->getSlugModelClass()::where('id', $oldSlug->id)->update(['active' => 1]);
                $this->disableLocaleSlugs($oldSlug->locale, $oldSlug->id);
            }
        } elseif (
            $this->slugNeedsSuffix($slugParams) &&
            (($oldSlug = $this->getExistingSlug($slugParams)) !== null) &&
            ($slugParams['slug'] === $this->suffixSlugIfExisting($slugParams))
        ) {
            if (!$oldSlug->active && ($slugParams['active'] ?? false)) {
                $this->getSlugModelClass()::where('id', $oldSlug->id)->update(['active' => 1]);
                $this->disableLocaleSlugs($oldSlug->locale, $oldSlug->id);
            }
        } else {
            $this->addOneSlug($slugParams);
        }
    }


}
