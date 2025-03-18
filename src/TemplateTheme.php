<?php

namespace TemplateTheme;

use App\Classes\Theme;

use App\Facades\Hook;
use App\Forms\Components\TinyEditor;
use Filament\Forms\Components\ColorPicker;
use luizbills\CSS_Generator\Generator as CSSGenerator;
use matthieumastadenis\couleur\ColorFactory;
use matthieumastadenis\couleur\ColorSpace;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Repeater;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Str; 

class TemplateTheme extends Theme
{
    public function boot() {}

    public function getFormSchema(): array
    {
        return [
            SpatieMediaLibraryFileUpload::make('images')
                ->collection('template-header')
                ->label('Upload Header Images')
                ->multiple()
                ->maxFiles(4)
                ->image()
                ->conversion('thumb-xl'),
            // Layouts
            Builder::make('layouts')
                ->blocks([
                    Builder\Block::make('layouts')
                        ->schema([
                            TextInput::make('name_content')
                                ->label('Name')
                                ->required(),
                            TinyEditor::make('about')
                                ->label('About Site')
                                ->profile('advanced')
                                ->required(),

                        ]),

                ])
                ->reorderableWithButtons()
                ->collapsed()
                ->reorderableWithDragAndDrop(false),
                Repeater::make('header_buttons')	
				->schema([
					TextInput::make('text')->required(),
					TextInput::make('url')
						->required()
						->url(),
					ColorPicker::make('text_color'),
					ColorPicker::make('background_color'),
				])
				->columns(2),


		];
    }

    public function onActivate(): void
    {
        Hook::add('Frontend::Views::Head', function ($hookName, &$output) {
            $output .= Vite::useHotFile(base_path('plugins') . DIRECTORY_SEPARATOR . $this->getInfo('folder') . DIRECTORY_SEPARATOR . 'vite.hot')
                ->useBuildDirectory('plugin' . DIRECTORY_SEPARATOR . Str::lower($this->getInfo('folder')) . DIRECTORY_SEPARATOR . 'build')
                ->withEntryPoints(['resources/css/app.css'])
                ->toHtml();
        });
    }

    public function getFormData(): array
    {
        return [
            'images' => $this->getSetting('images'),
            'appearance_color' => $this->getSetting('appearance_color'),
            'layouts' => $this->getSetting('layouts'),
            'name_content' => $this->getSetting('name_content'),
            'about' => $this->getSetting('about'),
            'header_buttons' => $this->getSetting('header_buttons'),

  ];
}
}
