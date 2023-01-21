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
        $list = MenuTitle::with('menu','titleList')->get();
        return $this->getView($this->getFolderView('menu.submenu_cout'), [
            'listMenus' => $menuStructureItems,
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
        foreach ($request->title as $title) {
            $item = new MenuTitle;
            $item->menu_id = $request->menu;
            $item->title = $title;
            $item->Save();
        }

        return redirect()->to('/dashboard/title-count');
    }

    public function subMenuEdit(Request $request, $id)
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
        $data = MenuTitle::where('menu_id',$id)->get();
        return $this->getView($this->getFolderView('menu.sub_count_edit'), [
            'listMenus' => $menuStructureItems,
            'single' => $data,
            'menu_id'=>$id
        ]);
    }

    public function updateCount(Request $request, $id)
    {
//        $validation = validation::make($request->all(),[
//            'title.*'=>'required|string',
//            'menu_id'=>'required|integer'
//        ]);
//        if ($validation->fails)
//        {
//
//        }
        MenuTitle::where('menu_id',$id)->delete();
        foreach ($request->title as $item)
        {
            $data =new MenuTitle();
            $data->title = $item;
            $data->menu_id = $id;
            $data->save();
        }
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