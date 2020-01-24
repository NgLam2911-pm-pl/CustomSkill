<?php

namespace LamPocketVN\CustomSkill;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat;
use pocketmine\Server;
use pocketmine\Player;

use LamPocketVN\CustomSkill\skills\Eternity;
use LamPocketVN\CustomSkill\skills\IronMiner;
use LamPocketVN\CustomSkill\skills\GoldMiner;
use LamPocketVN\CustomSkill\skills\DiamondMiner;
use LamPocketVN\CustomSkill\CreatePlayer;

class CustomSkill extends PluginBase 
{
	public $etn, $iron, $gold, $diamond = [];
	
	public function onEnable()
	{
		$this->getLogger()->info("CustomSkill by LamPocketVN");
		$this->getServer()->getPluginManager()->registerEvents(new Eternity($this), $this);
		$this->getServer()->getPluginManager()->registerEvents(new IronMiner($this), $this);
		$this->getServer()->getPluginManager()->registerEvents(new GoldMiner($this), $this);
		$this->getServer()->getPluginManager()->registerEvents(new DiamondMiner($this), $this);
		$this->getServer()->getPluginManager()->registerEvents(new CreatePlayer($this), $this);
	}
	public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool
	{
		switch(strtolower($cmd->getName()))
		{
			case "skill":
				if (!isset($args[0]))
				{
					$sender->sendMessage(TextFormat::RED."/skill <skill|help|info>");
					return true;
				}
				switch($args[0])
				{
					case "eternity":
						if(!$sender->hasPermission("skill.eternity"))
						{
							$sender->sendMessage(TextFormat::RED."You not have permission to use this skill !");
							return true;
						}
						if (!isset($args[1]))
						{
							$sender->sendMessage(TextFormat::RED."/skill eternity <On|Off>");
							return true;
						}
						if (($this->iron[$sender->getName()] == true) or ($this->gold[$sender->getName()] == true) or ($this->diamond[$sender->getName()] == true))
						{
							$sender->sendMessage(TextFormat::RED."Please turn off another skill before using this skill !");
						}
						switch($args[1])
						{
							case "on":
								if ($this->etn[$sender->getName()] == true) 
									$sender->sendMessage(TextFormat::RED."This skill is already enabled !");
								else $this->etn[$sender->getName()] = true;
								return true;
								break;
							case "off":
								if ($this->etn[$sender->getName()] == false) 
									$sender->sendMessage(TextFormat::RED."This skill is already disabled !");
								else $this->etn[$sender->getName()] = false;
								return true;
								break;
						}
						return true;
						break;
					case "ironminer":
						if(!$sender->hasPermission("skill.ironminer"))
						{
							$sender->sendMessage(TextFormat::RED."You not have permission to use this skill !");
							return true;
						}
						if (!isset($args[1]))
						{
							$sender->sendMessage(TextFormat::RED."/skill ironminer <On|Off>");
							return true;
						}
						if (($this->etn[$sender->getName()] == true) or ($this->gold[$sender->getName()] == true) or ($this->diamond[$sender->getName()] == true))
						{
							$sender->sendMessage(TextFormat::RED."Please turn off another skill before using this skill !");
						}
						switch($args[1])
						{
							case "on":
								if ($this->iron[$sender->getName()] == true) 
									$sender->sendMessage(TextFormat::RED."This skill is already enabled !");
								else $this->iron[$sender->getName()] = true;
								return true;
								break;
							case "off":
								if ($this->iron[$sender->getName()] == false) 
									$sender->sendMessage(TextFormat::RED."This skill is already disabled !");
								else $this->iron[$sender->getName()] = false;
								return true;
								break;
						}
						return true;
						break;				
					case "goldminer":
						if(!$sender->hasPermission("skill.goldminer"))
						{
							$sender->sendMessage(TextFormat::RED."You not have permission to use this skill !");
							return true;
						}
						if (!isset($args[1]))
						{
							$sender->sendMessage(TextFormat::RED."/skill goldminer <On|Off>");
							return true;
						}
						if (($this->etn[$sender->getName()] == true) or ($this->iron[$sender->getName()] == true) or ($this->diamond[$sender->getName()] == true))
						{
							$sender->sendMessage(TextFormat::RED."Please turn off another skill before using this skill !");
						}
						switch($args[1])
						{
							case "on":
								if ($this->gold[$sender->getName()] == true) 
									$sender->sendMessage(TextFormat::RED."This skill is already enabled !");
								else $this->gold[$sender->getName()] = true;
								return true;
								break;
							case "off":
								if ($this->gold[$sender->getName()] == false) 
									$sender->sendMessage(TextFormat::RED."This skill is already disabled !");
								else $this->gold[$sender->getName()] = false;
								return true;
								break;
						}
						return true;
						break;
					case "diamondminer":
						if(!$sender->hasPermission("skill.diamondminer"))
						{
							$sender->sendMessage(TextFormat::RED."You not have permission to use this skill !");
							return true;
						}
						if (!isset($args[1]))
						{
							$sender->sendMessage(TextFormat::RED."/skill diamondminer <On|Off>");
							return true;
						}
						if (($this->etn[$sender->getName()] == true) or ($this->iron[$sender->getName()] == true) or ($this->gold[$sender->getName()] == true))
						{
							$sender->sendMessage(TextFormat::RED."Please turn off another skill before using this skill !");
						}
						switch($args[1])
						{
							case "on":
								if ($this->diamond[$sender->getName()] == true) 
									$sender->sendMessage(TextFormat::RED."This skill is already enabled !");
								else $this->diamond[$sender->getName()] = true;
								return true;
								break;
							case "off":
								if ($this->diamond[$sender->getName()] == false) 
									$sender->sendMessage(TextFormat::RED."This skill is already disabled !");
								else $this->diamond[$sender->getName()] = false;
								return true;
								break;
						}
						return true;
						break;
				}
			return true;
			break;
		}
		return true;
	}
	
}
