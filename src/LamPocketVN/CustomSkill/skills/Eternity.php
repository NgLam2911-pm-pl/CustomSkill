<?php 

namespace LamPocketVN\CustomSkill\skills;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\item\Item;
use pocketmine\math\Vector3;

use LamPocketVN\CustomSkill\CustomSkill;

class Eternity implements Listener
{
	private $plugin;
	
	public function __construct(CustomSkill $plugin)
	{
		$this->plugin = $plugin;
	}
	public function onBreak (BlockBreakEvent $event)
	{
		$player = $event->getPlayer()->getName();
		if ($this->plugin->etn[$player] == true)
		{
			$block = $event->getBlock();
			$drops = $event->getDrops();
			foreach ($drops as $drop)
			{
				$block->getLevel()->dropItem(new Vector3($block->getX(), $block->getY(), $block->getZ()), $drop);
			}
			$event->setCancelled();
		}
	}
}