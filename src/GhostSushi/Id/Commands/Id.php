<?php

namespace GhostSushi\Id\Commands;

use pocketmine\block\VanillaBlocks;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class Id extends Command {

    public function __construct()
    {
        parent::__construct("id", "Voire l'id de l'item", "/id", ["meta"]);
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player){
            if ($sender->hasPermission(\GhostSushi\Id\Main::getInstance()->getConfig()->get("permission-command"))){
                $id = $sender->getInventory()->getItemInHand()->getId();
                $meta = $sender->getInventory()->getItemInHand()->getMeta();
                $info = $sender->getInventory()->getItemInHand()->getName();
                $nombreitem =$sender->getInventory()->getItemInHand()->getCount();
                $sender->sendMessage("\n§7=====§cEASYTEAM ID | META§7=====\n§r§cID: §f$id\n§r§cMETA: §f$meta\n§7=====§cEASYTEAM NAME | COUNT§7=====\n§r§cNAME: §f$info\n§cNOMBRE:§f $nombreitem");
            }
        }
    }

}