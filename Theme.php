<?php

namespace CMW\Theme\Wipe;

use CMW\Manager\Theme\IThemeConfig;

class Theme implements IThemeConfig
{
    public function name(): string
    {
        return "Wipe";
    }

    public function version(): string
    {
        return "0.0.4";
    }

    public function cmwVersion(): string
    {
        return "2.0";
    }

    public function author(): ?string
    {
        return "Zomb";
    }

    public function authors(): array
    {
        return [];
    }

    public function compatiblesPackages(): array
    {
        return [
            "Core", "Pages", "Users", "Faq", "News", "Votes", "Wiki", "Forum", "Contact", "Shop",
        ];
    }

    public function requiredPackages(): array
    {
        return ["Core", "Users"];
    }
}