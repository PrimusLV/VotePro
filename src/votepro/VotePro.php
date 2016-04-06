<?php
namespace votepro;

use pocketmine\plugin\PluginBase;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Player;

use pocketmine\utils\TextFormat as Text;

class VotePro extends PluginBase
{

	/** @var array $voted */
	public $voted = [];
	
	public function onEnable()
	{
		// Register event listener
		$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
	
	}

	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		if(strtolower($command->getName())){
			if(!$sender instanceof Player){
				$sender->sendMessage(Text::RED."Please run this command in-game!");
				return true;
			}

		}
	}

	public function hasVoted(Player $player){
		return in_array($player->getName(), $this->voted, true);
	}
}