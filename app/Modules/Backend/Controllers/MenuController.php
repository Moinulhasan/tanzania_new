<?php
/**
 * Created by PhpStorm.
 * User: Jream
 * Date: 5/12/2020
 * Time: 11:33 PM
 */

namespace App\Modules\Backend\Controllers;

use App\Models\Menu;
use App\Models\MenuTitle;
use App\Services\MenuService;
use Braintree\Error\Validation;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use TorMorten\Eventy\Facades\Eventy;

class MenuController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = MenuService::inst();
    }

    public function deleteMenuAction(Request $request)
    {
        $response = $this->service->deleteMenu($request);
        return response()->json($response);
    }

    public function updateMenuAction(Request $request)
    {
        $response = $this->service->updateMenu($request);
        return response()->json($response);
    }

    public function index(Request $request)
    {
        $menuLocations = Eventy::filter('gmz_menu_locations', admin_config('menu_location'));
        $currentLocation = '';

        $listMenus = $this->service->getListMenus();
        $menuID = $request->get('menu_id', 'none');

        $menuObject = [];
        if ($menuID == 'none') {
            if ($listMenus->count() > 0) {
                $menuID = $listMenus[0]->menu_id;
            }
        }

        if ($menuID != 'none') {
            $menuObject = $this->service->getMenuByID($menuID);
            if (!empty($menuObject)) {
                $currentLocation = $menuObject->menu_position;
            }
        }

        $menuStructureItems = $this->service->getMenuItemsByMenuID($menuID);
        $menuStructureItems = flatten_menu_data($menuStructureItems);

        return $this->getView($this->getFolderView('menu.index'), [
            'menuObject' => $menuObject,
            'listMenus' => $listMenus,
            'menuID' => $menuID,
            'menuStructureItems' => $menuStructureItems,
            'menuLocations' => $menuLocations,
            'currentLocation' => $currentLocation
        ]);
    }

    public function subMenuTitle(Request $request)
    {

        $listMenus = $this->service->getListMenus();
        $menuID = $request->get('menu_id', 'none');

        $menuObject = [];
        if ($menuID == 'none') {
            if ($listMenus->count() > 0) {
                $menuID = $listMenus[0]->menu_id;
            }
        }

        if ($menuID != 'none') {
            $menuObject = $this->service->getMenuByID($menuID);
            if (!empty($menuObject)) {
                $currentLocation = $menuObject->menu_position;
            }
        }

        $menuStructureItems = $this->service->getMenuItemsByMenuID($menuID);
        $menuStructureItems = flatten_menu_data($menuStructureItems);
        return $this->getView($this->getFolderView('menu.submenu_title'), [
            'listMenus' => $menuStructureItems,
        ]);
    }

    public function subMenuCount(Request $request)
    {
        $list = MenuTitle::with('menu')->get();
        return $this->getView($this->getFolderView('menu.submenu_cout'), [
            'listMenus' => $list,
        ]);
    }

    public function storeTitle(Request $request)
    {
        $validation = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'menu' => 'required|integer',
            'count' => 'required'
        ]);
        if ($validation->fails()) {
            return redirect()->back();
        }

        $item = new MenuTitle;
        $item->menu_id = $request->menu;
        $item->title = $request->count;
        $item->Save();

        return redirect()->to('/dashboard/title-count');
    }

    public function subMenuEdit(Request $request,$id)
    {
        $listMenus = $this->service->getListMenus();
        $menuID = $request->get('menu_id', 'none');

        $menuObject = [];
        if ($menuID == 'none') {
            if ($listMenus->count() > 0) {
                $menuID = $listMenus[0]->menu_id;
            }
        }

        if ($menuID != 'none') {
            $menuObject = $this->service->getMenuByID($menuID);
            if (!empty($menuObject)) {
                $currentLocation = $menuObject->menu_position;
            }
        }

        $menuStructureItems = $this->service->getMenuItemsByMenuID($menuID);
        $menuStructureItems = flatten_menu_data($menuStructureItems);
        $data = MenuTitle::find($id);
        return $this->getView($this->getFolderView('menu.sub_count_edit'), [
            'listMenus' => $menuStructureItems,
            'single' => $data
        ]);
    }

    public function updateCount(Request $request,$id)
    {
        $data = MenuTitle::find($id);
        $data->title = $request->count;
        $data->save();
        return redirect()->to('/dashboard/title-count');
    }

    public function deleteCount(Request $request)
    {
        $data = MenuTitle::find($request->params);
        $data->delete();
        return [
            'status' => true,
        ];
    }
}