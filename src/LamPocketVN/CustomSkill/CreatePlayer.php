<?php

namespace LamPocketVN\CustomSkill;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Player;

use LamPocketVN\CustomSkill\CustomSkill;

class CreatePlayer implements Listener
{
	private $plugin;
	
	public function __construct (CustomSkill $plugin)
	{
		$this->plugin = $plugin;
	}
	public function onJoin (PlayerJoinEvent $event)
	{
		$player = $event->getPlayer()->getName();
		$this->plugin->etn[$player] = false;
		$this->plugin->iron[$player] = false;
		$this->plugin->gold[$player] = false;
		$this->plugin->diamond[$player] = false;
	}
	
}