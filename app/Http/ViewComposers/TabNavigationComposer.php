<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Routing\Router;

class TabNavigationComposer
{
    protected $myRecord = false;
    protected $donForm = false;

    /**
     * TabNavigationComposer constructor.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->setMyRecordFlag($router->currentRouteName());
        $this->setCreatingDonFlag($router->currentRouteName());
    }

    /**
     * 自分の記録のアクティブフラグをセットする
     * @param string $name
     */
    private function setMyRecordFlag(string $name)
    {
        $this->myRecord = $name === 'myRecord' ? true : false;
    }

    /**
     * 記録するタブのアクティブフラグをセットする
     * @param string $name
     */
    private function setCreatingDonFlag(string $name)
    {
        $this->donForm = $name === 'don.create' ? true : false;
    }

    public function compose(View $view)
    {
        $view->with([
            'my_record' => $this->myRecord,
            'don_form' => $this->donForm
        ]);

    }
}
