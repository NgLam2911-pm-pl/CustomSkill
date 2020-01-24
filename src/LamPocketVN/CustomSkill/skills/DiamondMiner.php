<?php 

namespace LamPocketVN\CustomSkill\skills;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\item\Item;

use LamPocketVN\CustomSkill\CustomSkill;

class DiamondMiner implements Listener
{
	private $plugin;
	
	public function __construct(CustomSkill $plugin)
	{
		$this->plugin = $plugin;
	}
	public function onBreak (BlockBreakEvent $event)
	{
		$player = $event->getPlayer()->getName();
		if ($this->plugin->diamond[$player] == true)
		{
			$event->setDropsVariadic(Item::get(264,0,1));
		}
	}
}