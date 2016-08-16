<?php

namespace App\Presenters;

use Nette;
use App\Model;
use Ublaboo\DataGrid\DataGrid;


class HomepagePresenter extends BasePresenter
{
	/** @var Nette\Database\Context @inject */
	public $db;

	public function actionDefault()
	{
		$grid = new DataGrid($this, 'grid');
		$grid->setRememberState(FALSE);
		$grid->setRefreshUrl(TRUE);
		$grid->setPrimaryKey('id');
		$grid->setDataSource($this->db->table('comment')->order('created'));

		$grid->setItemsPerPageList([100, 500]);
		$grid->addColumnText('article_id', 'Clanek');

		$grid->addColumnText('name', 'Jmeno')
			->setFilterText();

		$grid->addColumnText('content', 'Text')
			->setFilterText();

		$this->template->grid = $grid;
	}

}
