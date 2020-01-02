package de.bord.festival.ticket;

import de.bord.festival.client.Client;
import de.bord.festival.exception.TicketManagerException;

import java.util.*;

/**
 *  The class gives information about total number of tickets, current number of tickets,
 *  the total number of price-levels and the actual price-level. It consists all price-levels for the Event.
 *
 */

public class TicketManager {
    private ArrayList<PriceLevel> priceLevels;
    private int nPriceLevels;
   // private double actualPriceLevelPercentage;
    private int actualPriceLevel = 0;
    private int nDayticketsLeft;
    private int nCampingticketsLeft;
    private int nVipticketsLeft;

    private int nDaytickets;
    private int nCampingtickets;
    private int nViptickets;

    private double incomeTicketSales;
    private boolean automaticPriceLevelChange;    //
    // wenn ich auf automatik wechsel muss das preislevel aktualisiert werden     TODO
    // im manuellen modus kann ich selbst das pricelevel angeben


    public TicketManager(ArrayList<PriceLevel> priceLevels,
                         int nPriceLevels,
                         int nDaytickets,
                         int nCampingtickets,int nViptickets ){

        this.priceLevels = priceLevels;
        Collections.sort(priceLevels);   //exception
        this.nPriceLevels = nPriceLevels;
        this.incomeTicketSales = 0.0;
        this.automaticPriceLevelChange = true;
        //this.actualPriceLevelPercentage = priceLevels.get(0).getPercentageOfSoldTickets();
        this.nDayticketsLeft = nDaytickets;
        this.nCampingticketsLeft = nCampingtickets;
        this.nVipticketsLeft = nViptickets;
        this.nDaytickets = nDaytickets;
        this.nCampingtickets = nCampingtickets;
        this.nViptickets = nViptickets;

    }

    /**
     * will be queried after every ticket sale
     * Once a fixed percentage has been exceeded, the next price level starts.
     */
    private void updatePriceLevel() throws TicketManagerException {


        if(isPercentageOfSoldTicketsExceeded()&& this.priceLevels.size() < this.actualPriceLevel+1){
            this.actualPriceLevel++;
            }
      /*  else if(){

        }
        else{
            throw new TicketManagerException("no valid price level available");
            }
      */  }

        private boolean isPercentageOfSoldTicketsExceeded(){

            if(totalNumberOfSoldTicketsInPercent() < priceLevels.get(this.actualPriceLevel).getPercentageForPricelevel()){
                /*getPriceLevel(this.actualPriceLevel).getPercentageForPricelevel()*/
                return true;
            }
            return false;
        }


    /**
     * total number of Tickets
     *
     */
    public int getnDaytickets() { return nDaytickets; }
    public int getnCampingtickets() { return nCampingticketsLeft; }
    public int getnViptickets() { return nViptickets; }
    public int totalNumberOfTickets(){return nDaytickets+nCampingtickets+nViptickets;}  //variable???



    /**
     * get tickets left
     *
     */
    public int getnDayticketsLeft() { return nDayticketsLeft; }
    public int getnCampingticketsLeft() { return nCampingticketsLeft; }
    public int getnVipticketsLeft() { return nVipticketsLeft; }
    public int totalNumberOfTicketsLeft(){return nDayticketsLeft+nCampingtickets+nVipticketsLeft;}


    /**
     * sold tickets
     *
     */
    public int getnSoldDaytickets(){ return nDaytickets - nDayticketsLeft;}
    public int getnSoldCampingtickets(){ return nCampingtickets - nCampingticketsLeft;}
    public int getnSoldViptickets(){ return nViptickets - nVipticketsLeft;}
    public int totalNumberOfSoldTickets(){ return totalNumberOfTickets()-totalNumberOfTicketsLeft();}
    public double totalNumberOfSoldTicketsInPercent(){return (totalNumberOfTicketsLeft()/totalNumberOfTickets())*100;}


    private void updateIncomeTicketSales(double ticketPrice){
        this.incomeTicketSales += ticketPrice;
    }

    public double getIncomeTicketSales(){
        return incomeTicketSales;
    }


    public int getPriceLevel(){   //Exception
        return actualPriceLevel;
    }


    /**
     *
     * @param isPriceLevelChangeAutomatic true for automatic, false for manually price level change
     */
    public void setAutomaticPriceLevelChange(boolean isPriceLevelChangeAutomatic) throws TicketManagerException {

        if (isPriceLevelChangeAutomatic == true) {
            actualPriceLevel = 0;
            int i = 0;
            while (i < priceLevels.size()) {
                updatePriceLevel();
            }
        }
            this.automaticPriceLevelChange = isPriceLevelChangeAutomatic;

    }

    public boolean getAutomaticPriceLevelChange(){
        return automaticPriceLevelChange;
    }

    public boolean setPriceLevel(int index){    /////////exception
        if(getAutomaticPriceLevelChange() == true && index >= 0 && index < priceLevels.size()){
            actualPriceLevel = index;
            return true;
        }
        else{
            return false;
        }
    }


    public boolean sellTickets(Client client) throws TicketManagerException {

        List<Ticket> ticketList = client.get_cart(); ///////TODO
        Ticket ticket = ticketList.get(0);
        int nDayTicketsSold = 0;
        int nCampingTicketsSold = 0;
        int nVIPTicketsSold = 0;
        double ticketIncome = 0.0;

        int i = 0;
        while (i < ticketList.size()) {
            if (ticketList.get(i).getTicketType() == Ticket.TicketType.DAY && getnDayticketsLeft() >= 1) {
                nDayTicketsSold++;
                ticketIncome += priceLevels.get(actualPriceLevel).getDayTicketPrice();
            } else if (ticketList.get(i).getTicketType() == Ticket.TicketType.CAMPING && getnCampingticketsLeft() >= 1) {
                nCampingTicketsSold++;
                ticketIncome += priceLevels.get(actualPriceLevel).getCampingTicketPrice();
            } else if (ticketList.get(i).getTicketType() == Ticket.TicketType.VIP && getnVipticketsLeft() >= 1) {
                nVIPTicketsSold++;
                ticketIncome += priceLevels.get(actualPriceLevel).getVipTicketPrice();
            } else {
                return false;
            }
            i++;
        }
        this.nDayticketsLeft -= nDayTicketsSold;
        this.nCampingticketsLeft -= nCampingTicketsSold;
        this.nVipticketsLeft -= nVIPTicketsSold;
        client.get_tickets().addAll(client.get_cart());
        client.clear_cart();
        updateIncomeTicketSales(ticketIncome);
        if(automaticPriceLevelChange == true){
            updatePriceLevel();
        }
        return true;   // boolean oder client mit Warenkorb
    }
}
